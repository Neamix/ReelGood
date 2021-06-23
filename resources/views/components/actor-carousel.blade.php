@foreach($ppl as $actor)
<?php
    $indexInner = $loop->index * 2;
    $indexIteration = $indexInner++;
    if(isset($actor[$indexInner]['name'])) {
        $arr = explode(' ',$actor[$indexInner]['name']);
        $fl  = (isset($arr[0])) ? substr($arr[0],0,1) : '';
        $sl  = (isset($arr[1])) ? substr($arr[1],0,1) : '';
    }
?>
<div class="collection">
    @if(isset($actor[$indexInner]))
    <div class="actor-circle mb-2 d-flex  align-items-center">
        <?php
            $rgbColor = color();
        ?>
        <div class="letters d-flex justify-content-center align-items-center fs-12 color-wh"
            style="background-color: rgb({{$rgbColor['r']}}, {{$rgbColor['g']}}, {{$rgbColor['b']}});">
            <?php echo $fl . $sl; ?>
        </div>
        @if(isset($actor[$indexInner]))<p class="mb-0 pl-2 fs-12">{{$actor[$indexInner]['name']}}</p>@endif
    </div>
    @endif
    @if(isset($actor[$indexIteration]))
    <div class="actor-circle d-flex  align-items-center ">
        <?php
            $rgbColor = color();
        ?>
        <div class="letters d-flex justify-content-center align-items-center fs-12 color-wh "
            style="background-color: rgb({{$rgbColor['r']}}, {{$rgbColor['g']}}, {{$rgbColor['b']}});">
            
            <?php                   
                if(isset($actor[$indexIteration]['name'])) {
                    $arr = explode(' ',$actor[$indexIteration]['name']);
                    $fl  = (isset($arr[0])) ? substr($arr[0],0,1) : '';
                    $sl  = (isset($arr[1])) ? substr($arr[1],0,1) : '';
                    echo $fl . $sl;
                }
            ?>
        </div>
        @if(isset($actor[$indexIteration]['name']))<p class="mb-0 pl-2 fs-12">{{$actor[$indexIteration]['name']}}</p>@endif
    </div>
    @endif
</div>
@endforeach
