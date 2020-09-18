<?php
use GameserverApp\Helpers\SiteHelper;
?>

@component('partials.v3.frame', ['type' => 'basic'])
    <article class="character-card" itemscope itemtype="http://schema.org/Person">
        <div class="tag">
            {!! $character->user->displayRoleLabel() !!}
        </div>
        <div class="row">

            <div class="col-md-5 character text-center">
                <a href="{{route('character.show', $character->id)}}">
                    <img src="{{$character->characterImage()}}" class="image">
                </a>
            </div>

            <div class="col-md-7 account">

                <h5>
                    {!! $character->showLink() !!}
                </h5>

                <div class="summary">

                    @if($character->hasGame() and $character->game->supportLevel())
                        <div>
                            Level: {{$character->level}}
                        </div>
                    @endif

                    <div>
                        Played: {{$character->hoursPlayed()}} hours
                    </div>


                    @if(GameserverApp\Helpers\SiteHelper::featureEnabled('player_status'))
                        @if( $character->online() )
                            <div>
                                Online since: {{str_replace('minutes', 'min.', $character->date('status_since')->diffForHumans())}}
                            </div>
                        @else
                            <div>
                                Last online: {{$character->date('status_since')->diffForHumans()}}
                            </div>
                        @endif
                    @endif

                    <div>
                        Created: {{$character->date('created_at')->diffForHumans()}}
                    </div>
                    <div>
                        Server:
                        @if($character->hasServer())
                            {{$character->server->name()}}
                        @endif
                    </div>

                    <br>

                    <div class="owner">
                        Owner:
                        @if($character->hasUser())
                            {!! $character->user->showLink(['limit' => 12]) !!}
                        @endif
                    </div>

                    @if( $character->hasTribe() )
                        <div  class="tribe">
                            {{ ucfirst(GameserverApp\Helpers\SiteHelper::groupName())}}:
                            @if( $character->hasTribe() )
                                <span itemprop="memberOf">
                                    {!! $character->tribes[0]->showLink(['limit' => 18]) !!}
                                </span>
                            @endif
                        </div>
                    @else
                        <br>
                    @endif

                    <br>

                    <div class="buttons">
                        @if(
                            !$character->hasTribe() and
                            $character->hasUser() and
                            (
                                (
                                    !auth()->check()
                                ) or
                                (
                                    auth()->check() and
                                    auth()->user()->canSendMessage()
                                )
                            )
                        )
                            @include('partials.v3.button', [
                                'route' => route('message.create', $character->user->id),
                                'title' => translate('recruit', 'Recruit'),
                                'class' => 'btn-theme-rock small'
                            ])
                        @endif

                        @if(
                            $character->hasUser() and
                            (
                                (
                                    !auth()->check()
                                ) or
                                (
                                    auth()->check() and
                                    auth()->user()->canSendMessage()
                                )
                            )
                        )
                            @include('partials.v3.button', [
                                'route' => route('message.create', $character->user->id),
                                'title' => translate('send_message', 'Send message'),
                                'class' => 'small'
                            ])
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </article>
@endcomponent