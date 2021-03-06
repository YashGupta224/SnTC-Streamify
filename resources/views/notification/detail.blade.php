@extends('notification.main')

@section('main-content')
<div class="row">
    <div class="col-8">
        <h3 class="p-1">{{$notification->title}}</h3>
    </div>
    <div class="row col-4">
    </div>
</div>

<div class="row p-3">

    <div class="col-6 p-1">
        <b>Notification Id: </b>{{$notification->id}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Tag: </b>{{$notification->tag->name}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Title: </b>{{$notification->title}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Stream: </b>{{$notification->stream->title}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Subtitle: </b>{{$notification->subtitle}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Description: </b>{{$notification->description}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Author: </b>{{$notification->author->name}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Time: </b>{{Carbon\Carbon::parse($notification->time)->diffForHumans()}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Link: </b>{{$notification->link}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Type: </b>{{$notification->type}}
    </div>
    <div class="col-6 p-1">
        <b>Notification Likes: </b>{{$notification->appUsers->count()}}
    </div>

    <div class="col-6 p-1">
        <b>Notification Contents: </b>{{$notification->contents->count()}}
        <br /> @foreach($notification->contents as $content)
                <b>{{$content->title}}</b>({{$content->image}}{{$content->video_id}})<br />
             @endforeach
    </div>
    <div class="col-12 p-1">
        <b>FCM Response: </b><pre style="background:#263238;color:#ffffff;" class="p-2" id="fcm_response">

        </pre>
    </div>
    <div class="col-12 p-3">
        <img style="max-height:500px;max-width:500px;" src="{{str_replace("www.dropbox.com","dl.dropboxusercontent.com",$notification->image)}}" />
    </div>

</div>
<div class="row p-3" >

</div>
<script>
    var data = JSON.parse('{!!$notification->fcm_json_response!!}');
    $('#fcm_response').text(JSON.stringify(data,null,' '));
</script>



@endsection
