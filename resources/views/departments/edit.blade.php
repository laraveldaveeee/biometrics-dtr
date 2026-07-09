<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background: #f1f5f9;
        font-family: "Segoe UI", Arial;
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

      .form-control {
        height: 50px;
        border-radius: 12px;
      }
    </style>
  </head>
  <body>
    <div class="form-card">
      <h3 class="fw-bold"> Edit Department </h3>
      <p class="text-secondary"> Update department information </p>
      <form action="{{
route(
'departments.update',
$department->id
)
}}" method="POST"> @csrf @method('PUT') <div class="mb-4">
          <label class="
form-label
fw-bold"> Department Name </label>
          <input type="text" name="department_name" class="form-control" value="{{
old(
'department_name',
$department
->department_name
)
}}" required>
        </div>
        <div class="
form-check
form-switch
mb-4">
          <input type="checkbox" name="status" value="1" class="
form-check-input" {{

old(
'status',
$department->status
)

?

'checked'

:

''

}}>
          <label class="
form-check-label"> Active Department </label>
        </div>
        <div class="
d-flex
justify-content-end
gap-3">
          <a href="{{
route(
'departments.index'
)
}}" class="
btn
btn-light"> Cancel </a>
          <button class="
btn
btn-primary"> Update Department </button>
        </div>
      </form>
    </div>
  </body>
</html>