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
          <div class="form-container">
            <form action="{{ url('edit_room',$data->id) }}" enctype="multipart/form-data" method="POST">
              @csrf
              <div>
                <label for="title">Room Title</label>
                <input type="text" name="title" id="title" required value="{{$data->room_title}}">
              </div>

              <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" required>{{$data->description}}</textarea>
              </div>

              <div>
                <label for="price">Price</label>
                <input type="number" name="price" id="price" required value="{{$data->price}}">
              </div>

              <div>
                <label for="type">Room Type</label>
                <select name="type" id="type" required>
                  <option>{{$data->room_type}}</option>
                  <option value="regular">Regular</option>
                  <option value="premium">Premium</option>
                  <option value="deluxe">Deluxe</option>
                </select>
              </div>

              <div>
                <label for="wifi">Free Wifi</label>
                <select name="wifi" id="wifi" required>
                    <option>{{$data->wifi}}</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div>
                <label for="">Current Image</label>
                <img src="{{ asset('storage/' . $data->image) }}" alt="Room Image">
              </div>

              <div>
                <label for="image">Upload Image</label>
                <input type="file" name="image" id="image">
              </div>

              <div>
                <input type="submit" value="Update Room">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('admin.footer')
  </body>
</html>
