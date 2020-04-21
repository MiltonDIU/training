@php
    $path = request()->path();
    $pathArray = explode('/', $path);
    $urlPath ="";
    $numItems = count($pathArray);
    $i = 0;
@endphp
<ol class="breadcrumb">
    <li><a href="{{url('/admin')}}">Home</a></li>
    @foreach($pathArray as $key=>$item)
        @php
            $urlPath .="/$item";
        $item=ucwords(str_replace('-',' ',$item));
        @endphp
        @if(++$i===$numItems)
            @php
                echo "<li class='active'>$item</li>";
            @endphp
            @else
                @if(!is_numeric($item))
                    @if($item=="Admin")
                        @php
                            $item = "Dashboard";

                            echo "<li><a href=".url($urlPath).">$item</a></li>";
                        @endphp
                    @else
                        @php
                            echo "<li><a href=".url($urlPath).">$item</a></li>";
                        @endphp
                @endif
            @endif
        @endif

    @endforeach
</ol>
