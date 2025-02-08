document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            
            xhr.open('POST', 'lib/process_contact.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('responseMessage').innerText = 'Pesan berhasil dikirim!';
                } else {
                    document.getElementById('responseMessage').innerText = 'Terjadi kesalahan.';
                }
            };
            
            xhr.send(formData);
        });