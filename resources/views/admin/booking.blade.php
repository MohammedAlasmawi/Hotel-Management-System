<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        table {
          width: 80%; /* Adjust the width of the table */
          margin: 20px auto; /* Center the table on the page */
          border-collapse: collapse; /* Collapse borders */
        }

        th, td {
          padding: 8px 12px; /* Padding inside each cell */
          text-align: left; /* Left-align the text */
          font-size: 14px; /* Smaller font size */
          border: 1px solid #ddd; /* Light border for the cells */
        }

        th {
          background-color: #f4f4f4; /* Light gray background for headers */
          font-weight: bold; /* Make header text bold */
        }

        td img {
          width: 50px; /* Set a smaller width for the image */
          height: auto; /* Maintain the image aspect ratio */
        }

        tr:nth-child(even) {
          background-color: #f9f9f9; /* Alternate row color for better readability */
        }

        tr:hover {
          background-color: #f1f1f1; /* Change row color on hover */
        }
      </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <table>
                <tr>
                  <th>Room id</th>
                  <th>Customer Name</th>
                  <th>email</th>
                  <th>phone Type</th>
                  <th>Arrival Date</th>
                  <th>Leaving Date</th>
                  <th>Status</th>
                  <th>Room Title</th>
                  <th>Room Image</th>
                  <th>Delete</th>
                  <th>Status update</th>
                </tr>

                @foreach ($data as $data)


                    <tr>
                        <td>{{$data->room_id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->start_date}}</td>
                        <td>{{$data->end_date}}</td>
                        <td>
                            @if ($data->status == 'rejected')
                            <span style="color: red;">rejected</span>
                        @endif
                        @if ($data->status == 'waiting')
                            <span style="color: yellow;">waiting</span>
                        @endif
                        @if ($data->status == 'approved')
                            <span style="color: green;">approved</span>
                        @endif
                        </td>
                        <td>{{$data->room->room_title}}</td>
                        <td><img src="{{ asset('storage/' . $data->room->image) }}" alt="Room Image"></td>
                        <td><a onclick="return confirm('are you sure?');" class="btn btn-danger" href="{{url('delete_booking',$data->id)}}">Delete</a></td>

                        <td><span style="padding-bottom: 10px; "><a class="btn btn-success" href="{{url('approve_book',$data->id)}}">Approve</a></span><a class="btn btn-warning" href="{{url('reject_book',$data->id)}}">Rejected</a></td>

                    </tr>
                    @endforeach

            </table>
          </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>
