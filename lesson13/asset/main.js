var addBtn = document.getElementById("add-product");
var nameProduct = document.querySelector(".name-product");
var priceProduct = document.querySelector(".price-product");
var descriptionProduct = document.querySelector(".description-product");
var manufacturerProduct = document.querySelector(".manufacturer-product");
var editBtn = document.getElementById("edit-product");
var searchBtn = document.querySelector(".search-btn")
var nameSearch = document.querySelector(".name-search")
var resetBtn = document.querySelector(".reset-btn")
addBtn.addEventListener("click", function () {
    editBtn.style.display = "none";
    var product = {
        name: nameProduct.value,
        price: priceProduct.value,
        description: descriptionProduct.value,
        manufacturer: manufacturerProduct.value,
    };
    console.log(product);
    if (product.name === "" || product.price === "" || product.description === "" || product.manufacturer === "") {
        alert("Vui lòng nhập đày đủ thống tin");
    }
    // gui api
    $.ajax({
        type: "POST",
        url: "api.php",
        data: {
            action: "add",
            product: product
        },
        success: function (result) {
            let res = JSON.parse(result);
            if (res.status) {
                alert(res.message);
                $('#exampleModal').modal('hide');
                viewProduct();
            }
            
        }
      });

})
function viewProduct() {
    $.ajax({
        type: "GET",
        url: "api.php",
        data: {
            action: "view"
        },
        success: function (result) {
           console.log(result);
           $(".table-body").html(result);
           
        }
    });
}
viewProduct();

function deleteProduct(id) {
    let result = confirm("Ban chac chan muon xoa");
   if(!result) {
    return;
   }

    $.ajax({
        type: "POST",
        url: "api.php",
        data: {
            action: "delete",
            id: id
        },
        success: function (result) {
           console.log(result);
           viewProduct();
           
        }
    });
    
}

function editProduct(id) {
    addBtn.style.display = "none";
    editBtn.style.display = "block";
    $.ajax({
        type: "POST",
        url: "api.php",
        data: {
            action: "edit",
            id: id
        },
        success: function (result) {
           let product = JSON.parse(result);
           console.log(product);
           $(".name-product").val(product.name);
           $(".price-product").val(product.price);
           $(".description-product").val(product.description);
           $(".manufacturer-product").val(product.manufacturer);
           $(".id-product").val(product.id);
           $('#exampleModal').modal('show');

        }
    });
}

editBtn.addEventListener("click", function () {
    var product = {
        name: nameProduct.value,
        price: priceProduct.value,
        description: descriptionProduct.value,
        manufacturer: manufacturerProduct.value,
        id: $(".id-product").val()
    };
    console.log(product);
    $.ajax({
        type: "POST",
        url: "api.php",
        data: {
            action: "update",
            product: product
        },
        success: function (result) {
           let res = JSON.parse(result);
           if (res.status) {
            alert(res.message);
            $('#exampleModal').modal('hide');
            viewProduct();
           }
        }
      });
})
searchBtn.addEventListener("click", function(){
   $.ajax({
    type: "POST",
    url:"api.php",
    data: {
        action:"search",
        name: nameSearch.value
    },
    success:function(result){
        $(".table-body").html(result);
    }
   })
})

resetBtn.addEventListener("click", function(){
    viewProduct();
})