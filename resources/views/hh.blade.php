<form action="{{ route('courses.store') }}" method="POST">
  @csrf

  <div>
      <label for="title">Titre du cours:</label>
      <input type="text" id="title" name="title" required>
  </div>

  <div>
      <label for="professor_id">ID du professeur:</label>
      <input type="text" id="professor_id" name="professor_id" required>
  </div>

  <div>
      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>
  </div>

  <button type="submit">Enregistrer</button>
</form>
