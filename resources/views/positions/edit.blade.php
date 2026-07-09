<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Position | NTC DTR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      body {
        background: #f1f5f9;
        font-family: "Segoe UI", Arial, sans-serif;
      }

      .form-card {
        max-width: 700px;
        margin: 80px auto;
        padding: 35px;
        background: white;
        border-radius: 22px;
        box-shadow:
          0 10px 35px rgba(0, 0, 0, .08);
      }

      .form-title {
        font-size: 25px;
        font-weight: 800;
      }

      .form-control {
        height: 50px;
        border-radius: 12px;
      }

      .btn-update {
        height: 48px;
        padding: 0 25px;
        border: 0;
        border-radius: 12px;
        color: white;
        background: #1769e8;
        font-weight: 700;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="form-card">
        <div class="form-title">
          <i class="bi bi-pencil-square text-primary"></i> Edit Position
        </div>
        <div class="text-secondary mb-4"> Update position information </div> @if($errors->any()) <div class="alert alert-danger"> @foreach($errors->all() as $error) <div>
            {{ $error }}
          </div> @endforeach </div> @endif <form action="{{
route(
'positions.update',
$position->id
)
}}" method="POST"> @csrf @method('PUT') <div class="mb-4">
            <label class="form-label fw-bold"> Position Name </label>
            <input type="text" name="position_name" class="form-control" value="{{
old(
'position_name',
$position->position_name
)
}}" required>
          </div>
          <div class="form-check form-switch mb-4">
            <input type="checkbox" name="status" value="1" id="status" class="form-check-input" {{

old(
'status',
$position->status
)

? 'checked'

: ''

}}>
            <label for="status" class="form-check-label"> Active Position </label>
          </div>
          <div class="d-flex
justify-content-end
gap-3">
            <a href="{{ route('positions.index') }}" class="btn btn-light px-4"> Cancel </a>
            <button type="submit" class="btn-update">
              <i class="bi bi-check-circle-fill"></i> Update Position </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>