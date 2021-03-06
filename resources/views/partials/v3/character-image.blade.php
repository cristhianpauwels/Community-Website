<article class="character-image">
    <a href="{{$character->showRoute()}}">
        <div class="picture_wrap">
            <div style="background-image:url('{{$character->image()}}')"></div>
        </div>

        <h1>
            {!! $character->showName(['limit' => 12]) !!} ({{$character->level}})
        </h1>

        @if($character->hasServer())
            <span class="label label-theme alternative">{{$character->server->name()}}</span>
        @endif
    </a>
</article>