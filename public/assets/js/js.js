const deleteBtns = document.querySelectorAll(".delete-btn");
var employee = document.querySelector("#employee");
var driver = document.querySelector("#driver");
var employeeAuto = document.querySelector("#employeeAuto");
var driverAuto = document.querySelector("#driverAuto");

function AjaxRequest(inputData, inputReturn){
    let name;
    $.ajax({
        url:'/instructors/formData/employee',
        type: 'GET',
        data: { employee: inputData.value }, 
        success: function (data, status, xhr) {
            console.log(Object.values(data));
            name = JSON.parse(data)[0].NOME_FUNCIONARIO;
            if(name !== ''){
                inputReturn.value = name;
            }else{
                inputReturn.value = "Nenhum registro!";
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            inputReturn.value = 'Erro!';
            console.log(errorMessage);
        }
    });
};

employee.addEventListener('keyup', (event) => {
    AjaxRequest(employee,employeeAuto);
});
driver.addEventListener('keyup', (event) => {
    AjaxRequest(driver,driverAuto);
});

deleteBtns.forEach(function(deleteBtn) {
    deleteBtn.addEventListener("click", function(e){
        if(confirm("Deseja remover esse item?")){
            this.form.submit();
        }
    })
});

