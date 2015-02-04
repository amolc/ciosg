function validate_cio()
{
	$('#addcio').form({
    url:'cio.php',
    onClick:function(){
    return $(this).form('validate');
    },
    success:function(data){
    $.messager.alert('Info', data, 'info');
    }
    });
	
}