@foreach($section->questions as $question)
    @include('survey::questions.single')
@endforeach