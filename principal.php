<?php

$dbPath = __DIR__ . '/db_task.sqlite';
$pdo = new PDO("sqlite:$dbPath");
$taskList = $pdo->query("SELECT * FROM tasks")->fetchAll(\PDO::FETCH_ASSOC);

?>

<?php require_once 'inicio-html.php' ?>

    <form action="/nova-tarefa" method="post" class="col-md-8 offset-2">
        <h1 class="display-4 text-center mb-5">Gerenciar Tarefas</h1>
        <fieldset class="border p-4 mt-5">
            <legend class="w-50 h6-display-5 text-center">Nova Tarefa</legend>

            <div class="form-group">
                <label>Titulo:</label>
                <input type="text" class="form-control" name="name" maxlength="50">
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" class="form-control" maxlength="150" required></textarea>
            </div>

            <div class="form-group">
                <label>Prazo:</label>
                <input type="date" name="deadline" class="form-control" maxlength="20">
            </div>

            <div>
                <fieldset class="border mb-3 p-1">
                    <legend class="w-auto h6">Prioridade</legend>
                    <label for="">Baixa</label>
                    <input type="radio" name="priority" value="baixa">

                    <label for="">| Média</label>
                    <input type="radio" name="priority" value="media">

                    <label for="">| Alta</label>
                    <input type="radio" name="priority" value="alta">
                </fieldset>
            </div>

            <div>
                <label for="">Tarefa Concluída:</label>
                <input type="checkbox" name="status" value="Tarefa Concluída">
                <br>
                <label for="">Lembrete por e-mail:</label>
                <input type="checkbox" name="lembrete">
            </div>

            <div class="col-sm-12 text-center">
                <input type="submit" value="Cadastrar" class="btn btn-primary">
            </div>
        </fieldset>
    </form>

    <table class="table table-bordered mt-4 col-md-8 offset-2 text-center">
        <theade>
            <tr>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluída</th>
                <th>Opções</th>
            </tr>
        </theade>
        <tbody>

        <?php foreach ($taskList as $task) : ?>
            <tr>
                <td><?= $task['name']; ?></td>
                <td><?= $task['description']; ?></td>
                <td><?= date('d/m/Y', strtotime($task['deadline'])); ?></td>
                <td><?= $task['priority']; ?></td>
                <td><?= $task['status']; ?></td>
                <td>
                    <a href="/editar-tarefa?id=<?= $task['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="/remover-tarefa?id=<?= $task['id']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

<?php require_once 'final-html.php' ?>