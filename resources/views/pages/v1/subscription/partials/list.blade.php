<?php
use GameserverApp\Models\Order;
?>
@include('partials.frame.simple-top')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        Subscription <small>({{$subscription->id()}})</small>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-6">
                <h4>Subscription details</h4>

                <table class="table">
                    <tr>
                        <td>
                            Content
                        </td>
                        <td>
                            <a href="{{$subscription->relatableUrl()}}">{{$subscription->relatableName()}}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Price
                        </td>
                        <td>
                            {{$subscription->currency()}} {{$subscription->amount()}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Status
                        </td>
                        <td>
                            {{$subscription->status}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Started
                        </td>
                        <td>
                            {{$subscription->created_at}}
                        </td>
                    </tr>
                </table>

                @if(!$subscription->expired())
                    <form method="post" action="{{route('subscription.cancel', $subscription->id())}}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-xs btn-danger">Cancel subscription</button>
                    </form>
                @endif
            </div>

            <div class="col-md-6">
                <h4>Subscription settings</h4>
                @if($subscription->expired())
                    <div class="alert alert-warning">
                        This subscription has been cancelled and can not longer be changed.
                    </div>
                @else
                    @if($subscription->requiresCharacter())

                        @if(!$subscription->hasCharacter())
                            <div class="alert alert-warning">
                                This subscriptions currently has no character setup. Please select a character to make sure you receive your rewards.
                            </div>
                        @else
                            <div class="alert alert-info">
                                You can determine which character should receive the contents of this subscription. Certain subscriptions can only be purchased on specific clusters, which also limits which character(s) you can choose. You can switch characters at any time.
                            </div>
                        @endif

                        <form method="post" action="{{route('subscription.change_character', $subscription->id())}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>
                                    Deliver content to:
                                </label>
                                <select name="character_id">
                                    @foreach($subscription->availableCharacters() as $character)
                                        @if(
                                            $subscription->hasCharacter() and
                                            $subscription->character->id == $character->id
                                        )
                                            <option selected value="{{$character->id}}">{{$character->name()}} [currect]</option>
                                        @else
                                            <option value="{{$character->id}}">{{$character->name()}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-xs">Change</button>
                            </div>
                        </form>
                    @endif
                @endif

            </div>

        </div>
    </div>
</div>
@include('partials.frame.simple-bottom')