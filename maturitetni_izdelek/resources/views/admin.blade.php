<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MojBon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>
    <div class="container text-center">
        <div class="row align-items-center">
          <div class="col">
            <button onclick="setPrikaz(0)" class="btn">Add User</button>
            <button onclick="setPrikaz(1)" class="btn">View Records</button>
          </div>
          <div id="content" class="col">
            <h2>Izberi funkcijo iz menija</h2>
          </div>
        </div>
      </div>

    <script>
      // Initialize prikaz from localStorage or default to 2
      let prikaz = localStorage.getItem('prikaz') !== null ? parseInt(localStorage.getItem('prikaz')) : 2;

      // Function to set prikaz and update the content
      function setPrikaz(value) {
        prikaz = value;
        localStorage.setItem('prikaz', prikaz);
        updateContent();
      }

      // Function to load content dynamically from Blade routes
      function updateContent() {
        const contentDiv = document.getElementById('content');
        let url = '';

        if (prikaz === 0) {
          url = '{{ route("addingUser") }}';
        } else if (prikaz === 1) {
          url = '{{ route("records") }}';
        } else {
          contentDiv.innerHTML = `<h2>Izberi funkcijo iz menija</h2>`;
          return;
        }

        // Fetch the content from the route and inject into content div
        fetch(url)
          .then(response => {
            if (!response.ok) throw new Error('Failed to load content');
            return response.text();
          })
          .then(data => {
            contentDiv.innerHTML = data;
          })
          .catch(error => {
            contentDiv.innerHTML = `<h3>Error: ${error.message}</h3>`;
          });
      }

      // Initial content load on page refresh
      updateContent();
  </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>