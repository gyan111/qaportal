@extends ('layouts.master')


@section ('content')
    <div class="row">
    	<div class="col-8 main">
    		<h1><a href="/exams/{{$exam_id}}/questions/create">Create a new Question</a></h1>
    		@if (count($questions))
    		    <table class="table table-bordered table-hover">
    		    	<thead>
    		    		<th>ID</th>
    		    		<th>Descripion</th>
    		    		<th>Answers</th>
    		    		<th>Manage</th>
    		    		<th>Delete</th>
    		    	</thead>
    		    	<tbody>
    		    		@foreach ( $questions as $question )
	    		    		<tr>
	    		    			<td>{{ $question->id }}</td>
	    		    			<td><a href="/exams/{{$exam_id}}/questions/{{$question->id}}">{{ $question->description }}</a></td>
	    		    			<td><a href="#">Answers</a></td>
	    		    			<td><a href="#">Manage</a></td>
	    		    			<td><a href="#">Delete</a></td>
	    		    		</tr>
    		    		@endforeach
    		    		
    		    	</tbody>
    		    </table>
    		    <nav aria-label="navigation">{{ $questions->links() }}</nav>
    		@endif
    	</div>
    	<div class="col-4">
    	   @include('layouts.errors')
    	</div>
    </div>
    
@endsection

@section ('footer')
    <!--Enqueue related scripts-->
@endsection