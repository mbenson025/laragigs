
{{-- non-blade format --}}
{{-- <h1><?php echo $heading; ?></h1>
<?php foreach($listings as $listing): ?>
    <h2><?php echo $listing['title']; ?></h2>
    <p><?php echo $listing['description']; ?></p>
<?php endforeach; ?> --}}

{{-- blade format --}}
<h1>{{$heading}}</h1>
@foreach($listings as $listing)
    <h2>
        {{$listing['title']}}
    </h2>
    <p>
        {{$listing['description']}}
    </p>
@endforeach