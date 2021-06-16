function Check_data() {

    if (document.getElementById("hokkaidou")) {
        a_form.japan.value = "hokkaidou";
        document.a_form.submit();
        return;
    }
    else if (document.getElementById("aomori")) {
        a_form.japan.value = "aomori";
        document.a_form.submit();
        return;
    }
}