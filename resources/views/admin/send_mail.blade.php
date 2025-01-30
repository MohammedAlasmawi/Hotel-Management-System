<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.css')

    <style>
        body {
          font-family: Arial, sans-serif;
        }

        .page-content {
          padding: 20px;
          background-color: #f9f9f9;
        }

        .form-container {
          max-width: 600px;
          margin: 0 auto;
          background: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container div {
          margin-bottom: 15px;
        }

        label {
          display: block;
          margin-bottom: 5px;
          font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 4px;
          font-size: 14px;
        }

        textarea {
          resize: vertical;
          height: 80px;
        }

        input[type="file"] {
          padding: 5px;
        }

        input[type="submit"] {
          background-color: #007bff;
          color: #fff;
          border: none;
          padding: 10px 15px;
          border-radius: 4px;
          cursor: pointer;
          font-size: 16px;
          transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
          background-color: #0056b3;
        }
      </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <center>
                <h1 style="font-size: 30px; font-weight:bold;">Mail Send to {{$data->name}}</h1>

                <form action="{{ url('mail',$data->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div>
                      <label for="title">Greeting</label>
                      <input type="text" name="greeting">
                    </div>

                    <div>
                    <label>Main Body</label>
                      <textarea name="body"></textarea>
                    </div>

                    <div>
                      <label>Action Text</label>
                      <input type="text" name="action_text">
                    </div>

                    <div>
                        <label>Action URL</label>
                        <input type="text" name="action_url">
                      </div>

                      <div>
                        <label>End Line</label>
                        <input type="text" name="endLine">
                      </div>

                    <div>
                      <input type="submit" value="Send Mail">
                    </div>
                  </form>
            </center>
          </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>
