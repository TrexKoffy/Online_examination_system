@extends('layout/student-layout')

@section('space-work')
<h2>Paid Exams</h2>

<table class="table">

    <thead>
        <th>#</th>
        <th>Exam Name</th>
        <th>Subject Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Total Attempt</th>
        <th>Available Attempt</th>
        <th>Copy Link</th>
    </thead>

    <tbody>
        @if(count($exams) > 0)
            @php $count = 1; @endphp
            @foreach($exams as $exam)
                <tr>
                    <td style="display:none;">{{ $exam->id }}</td>
                    <td>{{ $count++ }}</td>
                    <td>{{ $exam->exam_name }}</td>
                    <td>{{ $exam->subjects[0]['subject'] }}</td>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->time }} Hrs</td>
                    <td>{{ $exam->attempt }} Time</td>
                    <td>{{ $exam->attempt_counter }}</td>
                    <td>
                    <b><a href="#" style="color:red;" class="buyNow" data-prices="{{ $exam->prices }}" data-toggle="modal" data-target="#buyModal">Buy Now</a><b>
                    </td>
                </tr>
            @endforeach
        @else

            <tr>
                <td colspan="8">No Exams Available!</td>
            </tr>

        @endif
    </tbody>

</table>


    <!-- Buy Exam Modal -->
<div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buy Exam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <form id="buyForm">
        @csrf
            <div class="modal-body">
                <select name="price" id="price" required class="w-100"> 
                </select>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning buyNowButton">Buy Now</button>
            </div>
        </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){

        $('.buyNow').click(function(){
            var prices = JSON.parse($(this).attr('data-prices'));

            var html = '';
            html +=`
                <option value="">Select Currency(Price)</option>
                <option value="`+prices.NGN+`">NGN `+prices.NGN+`</option>
                <option value="`+prices.USD+`">USD `+prices.USD+`</option>
            `;

            $('#price').html(html);

        });

        $('#buyForm').submit(function(event){
            event.preventDefault();

            var formData = $(this).serialize();
            var price = $('#price').val();

            $.ajax({
                url:"{{ route('paymentNgn') }}",
                type:"POST",
                data:formData,
                success:function(response){

                }
            });

        });

        $('.copy').click(function(){
            $(this).parent().prepend('<span class="copied_text">Copied</span>');
        
            var code = $(this).attr('data-code');
            var url = "{{URL::to('/')}}/exam/"+code;

           var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();

            setTimeout(() => {
                $('.copied_text').remove();
            }, 1000);
        });
    });
</script>

@endsection