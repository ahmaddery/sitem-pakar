<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aturan</title>
    <style>/* Style for the container */

h1 {    color: #333;
        text-align: center;
        }
.container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for labels */
label {
    display: block;
    margin-bottom: 8px;
}

/* Style for text area */
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style for text input */
input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style for the submit button */
button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-left: 43%;
}
button:hover {
            background-color: #45a049;
 }

/* Style for the link */
a {
            color: #4CAF50;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        a:hover {
            color: #45a049;
        }
/* Optional: Style for form in a modal */
/* You can customize this if you are using a modal */
/* For simplicity, I'm assuming a modal with a class "modal" */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1;
}

/* Optional: Style for form in a modal */
/* You can customize this if you are using a modal */
/* For simplicity, I'm assuming a modal with a class "modal-content" */
.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>
    
   
</head>
<body>
<h1>Form Edit Aturan</h1>
    <!-- Edit mode content -->
    <div class="container">
        <form action="<?= base_url('/aturan/update/' . $aturan['IDAturan']); ?>" method="post">
            <label for="kondisi">Kondisi:</label>
            <textarea name="kondisi" id="kondisi" cols="30" rows="5" required><?= $aturan['Kondisi']; ?></textarea>

            <label for="tipe_kepribadian">Tipe Kepribadian:</label>
            <input type="text" name="tipe_kepribadian" id="tipe_kepribadian" value="<?= $aturan['TipeKepribadian']; ?>" required>

            <button type="submit">Update</button>
        </form>
    </div>
    <a href="<?= base_url('admin/aturan'); ?>">Kembali ke List Aturan</a>

    <script>
        // Auto-close the modal after submitting the form
        $('form').submit(function() {
            closeEditModal();
        });
    </script>
</body>
</html>
