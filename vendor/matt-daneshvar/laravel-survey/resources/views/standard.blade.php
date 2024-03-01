<div class="card p-3">
    <div class="card-header bg-back px-4">
        <h2 class="sondage relative text-sm font-semibold"><span class="bg-main-color text-white rounded-full py-2 px-3">Sondages</span></h2>
        @if(!$eligible)
            We only accept
            <strong>{{ $survey->limitPerParticipant() }} {{ \Str::plural('entry', $survey->limitPerParticipant()) }}</strong>
            per participant.
        @endif

        @if($lastEntry)
            You last submitted your answers <strong>{{ $lastEntry->created_at->diffForHumans() }}</strong>.
        @endif

    </div>
    @if(!$survey->acceptsGuestEntries() && auth()->guest())
        <div class="p-5">
            Please login to join this survey.
        </div>
    @else
    <div class="bg-gray-50" style="margin-top:20px">
        @foreach($survey->sections as $section)
            @include('survey::sections.single')
        @endforeach

        @foreach($survey->questions()->withoutSection()->get() as $question)
            @include('survey::questions.single')
        @endforeach

        @if($eligible)
            <div class="flex justify-center items-center">
                <button type="submit" class="btn bg-main-color text-white p-2 rounded ml-4" style="margin-bottom:15px">Voter</button>
            </div>
        @endif
    @endif
    </div>
</div>