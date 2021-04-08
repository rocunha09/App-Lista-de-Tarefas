function editar(id, tarefa){
    var form = document.createElement("form");
    form.setAttribute('method',"post");
    form.setAttribute('action',"tarefa_controller.php?acao=atualizar&id="+ id);
    form.setAttribute('class',"align-items-center");
    form.setAttribute('id','tarefa_'+ id);

    var input = document.createElement("input");
    input.setAttribute('type',"text");
    input.setAttribute('name',"tarefa");
    input.setAttribute('class',"col-5 mr-2");
    input.setAttribute('value',tarefa);

    var submit_atualizar = document.createElement("button");
    submit_atualizar.setAttribute('type',"submit");
    submit_atualizar.setAttribute('value',"Submit");
    submit_atualizar.setAttribute('class',"col-2 ml-1 btn btn-warning");
    submit_atualizar.innerHTML = "Atualizar";

    var submit_cancelar = document.createElement("a");
    submit_cancelar.setAttribute('onclick', "cancelar("+ id +", '"+tarefa+"')");
    submit_cancelar.setAttribute('class',"col-2 ml-1 btn btn-danger");
    submit_cancelar.innerHTML = "Cancelar";

    form.appendChild(input);
    form.appendChild(submit_atualizar);
    form.appendChild(submit_cancelar);
    
    let item = document.getElementById('tarefa_'+ id)
    console.log(item);
    item.innerHTML = '';
    item.appendChild(form); 

}

function cancelar(id, tarefa){
    let item = document.getElementById('tarefa_'+ id);
    item.innerHTML='';
    item.innerHTML = tarefa
}

function remover(id){
    location.href = 'todas_tarefas.php?acao=remover&id='+ id;
}
