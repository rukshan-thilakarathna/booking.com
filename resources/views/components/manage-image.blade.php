<div style="display: flex;flex-wrap: wrap;">
    @foreach($ImageArray as $key => $image)
        @if($image != null)
            <div id="div{{$key+1}}" style="height: 200px;margin: 15px;position: relative">
                <button style="background: black;color: white;text-decoration: none;position: absolute;top: 0;right: 0;" data-controller="button" data-turbo="true" class="btn btn-link" type="submit" form="post-form" formaction="{{ config('app.url') }}/dashboard/properties/deleteimage?image={{ $image }}&id={{ $propertyId }}">
                    <span>X</span>
                </button>
                <img style="width: 100%;height: 100%" src="{{ asset('Property/Images/'.$image) }}" alt="">
            </div>
        @endif
    @endforeach
</div>





{{--@push('scripts')--}}
{{--    <script>--}}
{{--        function deleteImage(image, id,url) {--}}
{{--            var url = url;--}}
{{--            document.getElementById(id).style.display = 'none';--}}


{{--            var xmlhttp=new XMLHttpRequest();--}}
{{--            xmlhttp.onreadystatechange=function() {--}}
{{--                if (this.readyState==4 && this.status==200) {--}}
{{--                    console.log(this.responseText)--}}
{{--                }--}}
{{--            }--}}

{{--            xmlhttp.open("GET",url,true);--}}
{{--            xmlhttp.send();--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}
