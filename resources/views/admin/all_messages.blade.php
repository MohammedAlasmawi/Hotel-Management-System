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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Message</th>
                  <th>Send Email</th>

                </tr>

                @foreach ($data as $data)
                    <tr>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->phone}}</td>
                        <td>{{$data->message}}</td>
                        <td><a href="{{url('send_mail',$data->id)}}" class="btn btn-success">Send Email</a></td>
                    </tr>
                @endforeach




            </table>
          </div>
        </div>
    </div>

    @include('admin.footer')
  </body>
</html>
