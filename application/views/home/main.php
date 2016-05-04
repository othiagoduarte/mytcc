<h3>MyTCC - Integrando orientandos e orientadores.</h3>
<hr>
<p>Bem-vindo ao <strong>MyTCC</strong>. Aplicação criada por estudantes do SENACRS em 2016/1.</p> </br>

<div ng-controller="homeController">
    
    <div ng-show="data.sucesso" class="alert alert-success">{{ data.mensagem }}</div>

    <input class="btn btn-primary btn-lg" type="button" value="Registre-se agora!" ng-click="open()"/> </br> <br>
    <input class="btn btn-info btn-sm" type="button" value="Feedback" ng-click="setFeedBack()"/> </br>
    
    <div ng-show="feedback">
        
    <table class="table table-striped table-bordered">						
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Aluno</th>
                <th>Professor</th>					
            </tr>
        </thead>        
        <tbody>
            <try>
                <td>CPF: {{ data.usuario.cpf }} <br>
                    Senha: {{ data.usuario.senha }} <br>
                    Conf: {{ data.usuario.conf }} <br>
                    Tipo: {{ data.usuario.tipo }} <br></td>
                <td>Nome: {{ data.aluno.nome }} <br>
                    Email: {{ data.aluno.email }} <br>
                    Matricula: {{ data.aluno.matricula }} <br>
                    Estado: {{ data.aluno.estado }} <br>
                    Cidade: {{ data.aluno.cidade }} <br>
                    Bairro: {{ data.aluno.bairro }} <br>
                    Telefone: {{ data.aluno.telefone }} <br></td>
                <td>Vagas: {{ data.professor.vagas }} <br>
                    Dia: {{ data.professor.turnoDia }} <br>
                    Noite: {{ data.professor.turnoNoite }} <br>
                    Nome: {{ data.professor.nome }} <br>
                    Email: {{ data.professor.email }} <br>
                    Matricula: {{ data.professor.matricula }} <br>
                    Estado: {{ data.professor.estado }} <br>
                    Cidade: {{ data.professor.cidade }} <br>
                    Bairro: {{ data.professor.bairro }} <br>
                    Telefone: {{ data.professor.telefone }} <br></td>
            </tr>
        </tbody>
    </table>		
    </div>
</div>
