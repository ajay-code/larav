<?php

namespace App\Http\Controllers\User;

use App\User;
use Carbon\Carbon;
use App\Models\Bid;
use App\Models\Product;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Notifications\NewBid;
use Cmgmyr\Messenger\Models\Thread;
use App\Http\Controllers\Controller;
use Cmgmyr\Messenger\Models\Message;
use Illuminate\Support\Facades\Auth;
use Cmgmyr\Messenger\Models\Participant;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAddWishPage()
    {
        return view('addwish');
    }

    public function showWishListPage()
    {
        return view('wishlist');
    }

    public function showNotifications()
    {
        $user = auth()->user();
        $notifications = $user->notifications()->get();
        $user->unreadNotifications->markAsRead();
        $type = 'all';
        return view('user.notifications', compact('notifications', 'type'));
    }

    public function showUnreadNotifications()
    {
        $user = auth()->user();
        $notifications = $user->unreadNotifications()->get();
        $user->unreadNotifications->markAsRead();
        $type = 'unread';
        return view('user.notifications', compact('notifications', 'type'));
    }


    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user')); 
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('user.editprofile', compact('user')); 
    }

    public function changeProfile(Request $request)
    {
        // return $request->country;
        Auth::user()->update([
            'name' => $request->name,
            'country' => $request->country,
            'city' => $request->city
        ]);

        return back();
        
    }



    /*Complete the Wish*/
    public function wishCompleted(Product $product)
    {
        $product->order_completed = true;
        $product->save();
        alert()->success('your wish has been succssfully marked as completed');
        return back();
    }

    /*Make Bid On the Product*/
    public function makeBid(Request $request, $slug)
    {
        $this->validate($request, [
            'budget' => 'required|numeric|min:0',
            'message' => 'required'
        ]);

        $product = Product::where('slug', $slug)->first();
        $bid = new Bid($request->all());
        $bid->product_id = $product->id;
        $from = auth()->user();
        $bid->seller()->associate($from);
        $bid->save();

        $product->user->notify(new NewBid($product->user, $bid, $from));
        
        
        $this->createMessageThread($product, $request);

    }

    public function createMessageThread($product, $request)
    {
        $thread = Thread::create(
            [
                'subject' => 'bid on product'. $product->title,
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => Auth::user()->name.' made bid of $'.$request->input('budget'). ' on the wish '. 
                                '<a href="/products/'. $product->slug.'">' . $product->title. '</a>',
            ]
        );
        
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $request->input('message'),
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );

        // Recipients
        if ($product->user) {
            $thread->addParticipant($product->user->id);
        }
    }


}
