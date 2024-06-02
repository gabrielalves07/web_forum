@csrf
<div class="mb-3">
    <label for="subjectInput" class="form-label">Assunto</label>
    <input id="subjectInput" class="form-control" type="text" placeholder="Assunto" name="subject" value="{{ $support->subject ?? old('subject') }}">
</div>
<div class="mb-3">
    <label for="bodyArea" class="form-label">Descrição</label>
    <textarea id="bodyArea" class="form-control" name="body" cols="30" rows="5" placeholder="Descrição">{{ $support->body ?? old('body') }}</textarea>
</div>
<div class="d-flex justify-content-start gap-2">
    <a class="btn btn-outline-secondary" href="{{ route('supports.index') }}">Voltar</a>
    <button type="submit" class="btn btn-dark">Submeter</button>
</div>
