<?php

$dbPath = __DIR__ . '/db_task.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?;");
$stmt->bindValue(1, $id, PDO::PARAM_INT);
$stmt->execute();
$task = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Tarefas</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- font awasome (icones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/Kgo9kWxR3td5kRa1W5mCJIVHk7I4UwoZ9XKf5nMt9Fk5El4" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <form action="/editar-tarefa?id=<?=$task['id'];?>" method="post" class="col-md-6 offset-3">
        <fieldset class="border p-4 mt-5">
            <legend class="w-50 h6-display-5 text-center">Editar Tarefa</legend>

            <div class="form-group">
                <label>Titulo:</label>
                <input type="text"
                       class="form-control"
                       name="name"
                       maxlength="50"
                       value="<?= $task['name'] ?>"
                >
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description"
                          class="form-control"
                          maxlength="150" required><?= $task['description'] ?>

                </textarea>
            </div>

            <div class="form-group">
                <label>Prazo:</label>
                <input type="date"
                       name="deadline"
                       class="form-control"
                       maxlength="20"
                       value="<?= $task['deadline'] ?>"
                >
            </div>

            <div>
                <fieldset class="border mb-3 p-1">
                    <legend class="w-auto h6">Prioridade</legend>
                    <label for="">Baixa</label>
                    <input type="radio"
                           name="priority"
                           value="baixa"
                    <?php if ($task['priority'] === 'baixa') echo 'checked'; ?>
                </fieldset>


                <label for="">| Média</label>
                <input type="radio"
                       name="priority"
                       value="media"
                    <?php if ($task['priority'] === 'media') echo 'checked'; ?>
                >

                <label for="">| Alta</label>
                <input type="radio"
                       name="priority"
                       value="alta"
                    <?php if ($task['priority'] === 'alta') echo 'checked'; ?>
                >
        </fieldset>
</div>

<div>
    <label for="">Tarefa Concluída:</label>
    <input type="checkbox"
           name="status"
           value="concluida"
        <?= ($task['status'] == 'concluida') ? 'checked' : ""?>
    >
    <br>
    <label for="">Lembrete por e-mail:</label>
    <input type="checkbox"
           name="lembrete">
</div>

<div class="col-sm-12 text-center">
    <input type="submit" value="Editar" class="btn btn-primary">
</div>
</fieldset>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

</body>

</html>



