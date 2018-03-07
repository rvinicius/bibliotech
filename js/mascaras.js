function mascara(obj,func){
    v_obj=obj;
    v_fun=func;
    setTimeout("executamascara()",1);
}
function executamascara(){
    v_obj.value=v_fun(v_obj.value);
}

function mascTel(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}

function mascCpf(v){
    v=v.replace(/\D/g,"")
    v=v.replace(/(\d{3})(\d)/,"$1.$2");
    v=v.replace(/(\d{3})(\d)/,"$1.$2");

    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    return v
}

function mascRg(v){
    v=v.replace(/\D/g,"");
        v=v.replace(/(\d)(\d{7})$/,"$1.$2");
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");
        v=v.replace(/(\d)(\d)$/,"$1-$2");
    return v;
}