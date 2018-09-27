var url;

function doSearch(){
      $('#dg').datagrid('load',{
          libellefrancais: $('#libellefrancais').val(),
          adresse: $('#adresse').val()
      });
}

function newArbre(){
    $('#dlg').dialog('open').dialog('setTitle','Ajouter Arbre');
    $('#fm').form('clear');
    url = 'save_arbre.php';
}

function editArbre(){
  var row = $('#dg').datagrid('getSelected');
  if (row){
    $('#dlg').dialog('open').dialog('setTitle','Editer Arbre');
    $('#fm').form('load',row);
      url = 'update_arbre.php?id='+row.id;
  }
}

function saveArbre(){
    $('#fm').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title: 'Error',
                    msg: result.errorMsg
                });
            } else {
                $('#dlg').dialog('close');
                $('#dg').datagrid('reload');
            }
        }
    });
  }

function destroyUser(){
        var row = $('#dg').datagrid('getSelected');
        if (row){
            $.messager.confirm('Confirmer','Etes-vous certain de vouloir supprimer cette reference ?',function(r){
                if (r){
                    $.post('delete_arbre.php',{_id:row._id},function(result){
                        if (result.success){
                            $('#dg').datagrid('reload');
                        } else {
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        }
                    },'json');
                }
            });
        }
    }
    //function formatColumn(colName, value,row){
    //  console.log("row");
    //  return "row."+colName;
    //}
