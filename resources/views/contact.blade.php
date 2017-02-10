@extends('layouts.main')
@section('content')

    <div id="contact-page" class="container">
       <div class="bg">

           <div class="row">
               <div class="col-sm-8">
                   <div class="contact-form">
                       <h2 class="title text-center">Get In Touch</h2>
                       <div class="status alert alert-success" style="display: none"></div>
                       <form id="main-contact-form" action="{{ url('/contact') }}" class="contact-form row" name="contact-form" method="post">
                           {{ csrf_field() }}
                           <div class="form-group col-md-6 @if($errors->has('name')) {{ 'has-error' }} @endif">
                               <input type="text" name="name" class="form-control " required="required" placeholder="Name"
                                value="{{ old('name') }}"
                               >
                           </div>
                           <div class="form-group col-md-6 @if($errors->has('email')) {{ 'has-error' }} @endif">
                               <input type="email" name="email" class="form-control" required="required" placeholder="Email"
                                       value="{{ old('email') }}"
                               >
                           </div>
                           <div class="form-group col-md-12 @if($errors->has('subject')) {{ 'has-error' }} @endif">
                               <input type="text" name="subject" class="form-control" required="required" placeholder="Subject"
                                      value = "{{ old('subject') }}"
                               >
                           </div>
                           <div class="form-group col-md-12 @if($errors->has('message')) {{ 'has-error' }} @endif">
                               <textarea name="message" id="message" required="required" class="form-control" rows="8"
                                         placeholder="Your Message Here">{{ old('message') }}</textarea>
                           </div>
                           <div class="form-group col-md-12">
                               <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                           </div>
                       </form>
                   </div>
               </div>
               <div class="col-sm-4">
                   
                   <div class="contact-info">
                       <h2 class="title text-center">Contact Info</h2>
                       <address>
                           <p>E-Shopper Inc.</p>
                           <p>935 W. Webster Ave New Streets Chicago, IL 60614, NY</p>
                           <p>Newyork USA</p>
                           <p>Mobile: +2346 17 38 93</p>
                           <p>Fax: 1-714-252-0026</p>
                           <p>Email: info@e-shopper.com</p>
                       </address>
                       <div class="social-networks">
                           <h2 class="title text-center">Social Networking</h2>
                           <ul>
                               <li>
                                   <a href="#"><i class="fa fa-facebook"></i></a>
                               </li>
                               <li>
                                   <a href="#"><i class="fa fa-twitter"></i></a>
                               </li>
                               <li>
                                   <a href="#"><i class="fa fa-google-plus"></i></a>
                               </li>
                               <li>
                                   <a href="#"><i class="fa fa-youtube"></i></a>
                               </li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div><!--/#contact-page-->


@endsection
