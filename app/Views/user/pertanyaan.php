<?php include('include/template.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pertanyaan</title>
    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    <style>
        .question-container {
            display: none;
        }

        .current-question {
            display: block;
        }

        #submitBtn {
            display: none;
        }

        #resultMessage {
            display: none;
        }

        body {
    font-family: Arial, sans-serif;
}

h1, h2, p {
    margin: 0;
    padding: 0;
}

#jawabanForm {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.question-container {
    display: none;
    text-align: center;
}

.current-question {
    display: block;
}
.head-judul{
    margin-top: 100px;
    display: flex;
    align-items: center;
    justify-content: center;
}

button {
    padding: 8px 12px;
    margin: 0 5px;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
}

button:hover {
            background-color: #0056b3;
        }

.bawah-button{
    text-align: center;
    margin-left: 220px;
}

#resultMessage {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}


    </style>
</head>

<body>
<div class="head-judul">
    <h1>Daftar Pertanyaan</h1>
    </div>
    <form action="/users/jawab" method="post" id="jawabanForm">
        <div class="question-container current-question" data-question="1">
            <h2>Pertanyaan 1</h2>
            <p><?= $pertanyaan[0]['PertanyaanText']; ?></p>
            <br>
            <input type="radio" name="jawaban[<?= $pertanyaan[0]['IDPertanyaan']; ?>]" value="ya"> Ya
            <input type="radio" name="jawaban[<?= $pertanyaan[0]['IDPertanyaan']; ?>]" value="tidak"> Tidak
            <br><br>
            <button type="button" onclick="previousQuestion()">Previous</button>
            <button type="button" onclick="nextQuestion()">Next</button>
        </div>

        <?php for ($i = 1; $i < count($pertanyaan); $i++) : ?>
            <div class="question-container" data-question="<?= $i + 1; ?>">
                <h2>Pertanyaan <?= $i + 1; ?></h2>
                <p><?= $pertanyaan[$i]['PertanyaanText']; ?></p>
                <br>
                <input type="radio" name="jawaban[<?= $pertanyaan[$i]['IDPertanyaan']; ?>]" value="ya"> Ya
                <input type="radio" name="jawaban[<?= $pertanyaan[$i]['IDPertanyaan']; ?>]" value="tidak"> Tidak
                <br><br>
                <button type="button" onclick="previousQuestion()">Previous</button>
                <button type="button" onclick="nextQuestion()">Next</button>
            </div>
        <?php endfor; ?>
    <div class="bawah-button">
        <button type="submit" id="submitBtn">Kirim Jawaban</button>
        </div>
    </form>
    <div id="resultMessage">
        <h1>Anda akan mendapatkan email untuk tipe kepribadian Anda. Tunggu 5-10 menit.</h1>
    </div>

    <!-- Include SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script>
        var currentQuestion = 1;

        function nextQuestion() {
            var currentContainer = document.querySelector('.current-question');
            var selectedAnswer = getSelectedAnswer(currentContainer);

            if (selectedAnswer) {
                currentContainer.classList.remove('current-question');
                currentQuestion++;

                var nextContainer = document.querySelector('[data-question="' + currentQuestion + '"]');
                if (nextContainer) {
                    nextContainer.classList.add('current-question');
                } else {
                    // If there are no more questions, show the submit button
                    document.getElementById('submitBtn').style.display = 'block';
                }
            } else {
                // If no answer is selected, show a SweetAlert2 alert
                showSweetAlert('Error', 'Silahkan menjawab pertanyaan terlebih dahulu.', 'error');
            }
        }

        function previousQuestion() {
            if (currentQuestion > 1) {
                var currentContainer = document.querySelector('.current-question');
                currentContainer.classList.remove('current-question');
                currentQuestion--;

                var previousContainer = document.querySelector('[data-question="' + currentQuestion + '"]');
                if (previousContainer) {
                    previousContainer.classList.add('current-question');
                }
            }
        }

        function getSelectedAnswer(container) {
            var selectedAnswer = container.querySelector('input[name^="jawaban"]:checked');
            return selectedAnswer ? selectedAnswer.value : null;
        }

        function showSweetAlert(title, text, icon) {
            Swal.fire({
                title: title,
                text: text,
                icon: icon,
                confirmButtonText: 'OK',
            });
        }

        document.getElementById('submitBtn').addEventListener('click', function () {
            // You can customize the SweetAlert2 options here
            showSweetAlert('Success', 'Jawaban berhasil dikirim.', 'success');
            document.getElementById('resultMessage').style.display = 'block';
        });
    </script>

</body>

</html>
