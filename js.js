function checkspace(checkstr) {
    var str = '', i;
    for (i = 0;i<checkstr.length;i++){
        str = str+' ';
    }
    return (str===checkstr);
}
function check() {
    if (checkspace(document.frm.password.value)){
        document.frm.password.focus();
        alert("原密码不能为空！");
        return false;
    }
    if (checkspace(document.frm.password1.value)){
        document.frm.password1.focus();
        alert("新密码不能为空！");
        return false;
    }
    if (checkspace(document.frm.password2.value)){
        document.frm.password2.focus();
        alert("确认密码不能为空！");
        return false;
    }
    if (document.frm.password1.value!==document.frm.password2.value){
        document.frm.password1.focus();
        document.frm.password1.value = '';
        document.frm.password2.value = '';
        alert("新密码和确认密码不相同，请重新输入");
        return false;
    }
    document.admininfo.submit();
}