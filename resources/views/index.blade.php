<html>
    <head>
        <title>Document</title>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
    </head>
    <body>
        <select id="country">
            <option value="">Select Country</option>  
             <!--loop goes here--> 
            @foreach ($countries as $country)
                <option value="{{$country->id}}">{{$country->country}}</option>
            @endforeach 
             <!--loop ends here-->
        </select>
        <select id="state">
            <option value="">Select State</option>    
        </select>

        <select id="city">
            <option value="">Select City</option>    
        </select>
         <!--script goes here-->
        <script>
            $(document).ready(function(){
                $('#country').change(function(){
                    var cid=$(this).val();
                    $('#city').html('<option value="">Select City</option>')
                    $.ajax({
                        url:'{{url("/getState")}}',
                        type:'post',
                        data:'cid='+cid+'&_token={{csrf_token()}}',
                        success:function(result){
                            $('#state').html(result)
                        }
                    });
                });

                $('#state').change(function(){
                    var sid=$(this).val();
                    $.ajax({
                        url:'{{url("/getCity")}}',
                        type:'post',
                        data:'sid='+sid+'&_token={{csrf_token()}}',
                        success:function(result){
                            $('#city').html(result)
                        }
                    });
                });
            });
        </script>
         <!--Script ends here-->
    </body>
</html>