<div style="display: flex;flex-wrap: wrap;">
    @foreach($ImageArray as $key => $image)
        <div id="div{{$key+1}}" style="width: 310px;margin: 15px;position: relative">
            <span onclick="deleteImage('{{$image}}','div{{$key+1}}')" style="position: absolute;right: -7px;top: -7px;cursor: pointer;background: black;width: 20px;height: 20px;border-radius: 50%;color: white;display: flex;align-items: center;justify-content: center;font-weight: bold;" id="image_{{$key+1}}">X</span>
            <img style="width: 100%" src="{{ asset('Property/Images/'.$image) }}" alt="">
        </div>
    @endforeach
</div>

<script>
    function deleteImage(image, id) {
        document.getElementById(id).style.display = 'none';

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        // Using a properly formatted URL
        var url = "{{ route('DeleteImage',':image') }}";
        url = url.replace(':image', encodeURIComponent(image));

        xmlhttp.open("GET", url, true);
        xmlhttp.send();
    }
</script>
