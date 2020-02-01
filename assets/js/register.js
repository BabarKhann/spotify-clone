$(document).ready(function () {

    $("#loginForm").show();
    $("#registerForm").hide();

    $("#hideLogin").click(function () {
        $("#loginForm").hide();
        $("#registerForm").show();
    });

    $("#hideRegister").click(function () {
        $("#loginForm").show();
        $("#registerForm").hide();
    })
});