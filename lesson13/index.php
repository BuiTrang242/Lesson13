<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <h2>Danh sách sản phẩm</h2>
<div class="action-links">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Thêm mới
</button>

    <input type="text" class="name-search">
    <button class="btn btn-secondary search-btn">Tìm kiếm</button>
    <button class="btn btn-info reset-btn">Reset</button>

   
    <!-- <a href="./index.php?page=view&id=<product_id>">Chi tiết</a> -->
</div>
<table class="table">
    <thead>

        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Mô tả</th>
            <th>Nhà sản xuất</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="table-body">
        <tr>
            <td> Đang tải ....</td>
        </tr>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm mới</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <input type="text" class="form-control mt-2 name-product" placeholder="Tên sản phẩm">
            <input type="text" class="form-control mt-2 price-product" placeholder="Giá">
            <input type="text" class="form-control mt-2 description-product" placeholder="Mô tả">
            <input type="text" class="form-control mt-2 manufacturer-product" placeholder="Nhà sản xuất">
            <input type="hidden" class="form-control mt-2 id-product" >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="add-product">Thêm</button>
        <button type="button" class="btn btn-primary" id="edit-product">Cập nhật</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./asset/main.js"></script>

</body>
</html>