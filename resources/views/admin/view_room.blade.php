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
                  <th>Room Title</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>WiFi</th>
                  <th>Room Type</th>
                  <th>Image</th>
                  <td>
                    Delete
                </td>
                <td>
                  update
              </td>
                </tr>

                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->room_title}}</td>
                        <td>{{$data->description}}</td>
                        <td>{{$data->price}}$</td>
                        <td>{{$data->wiFi}}</td>
                        <td>{{$data->room_type}}</td>
                        <td><img src="{{ asset('storage/' . $data->image) }}" alt="Room Image"></td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('are you sure?');" href="{{url('delete_room',$data->id)}}">Delete</a>
                        </td>

                        <td>
                            <a class="btn btn-warning" href="{{url('update_room',$data->id)}}">Update</a>
                        </td>
                    </tr>
                @endforeach



            </table>
          </div>
        </div>
    </div>




    @include('admin.footer')
  </body>
</html>
