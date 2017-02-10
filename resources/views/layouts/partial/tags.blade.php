@inject('helper', 'App\Http\Utilities\Helper')
@if (isset($helper))
	<script>
	var tags = [
	    @foreach($helper->tagsAll() as $tag)
	    {
	        tag: "{{ $tag->name }}"
	    },
	    @endforeach
	];

	/*Selectize Select Multiple Tags In Input*/
    $( document ).ready(function() {
        $('#tags').selectize({
            delimiter: ',',
            persist: false,
            valueField: 'tag',
            labelField: 'tag',
            searchField: 'tag',
            options: tags,
            create: function(input) {
                return {
                    tag: input
                }
            }
        });
    });
	</script>
@endif
