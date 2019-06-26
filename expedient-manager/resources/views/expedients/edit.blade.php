@extends('.layouts.app')

@section('title', 'Modificación de expedientes')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-xs-12">
                    <div class="card">
                        <div class="card-header">Editar expediente</div>
                        <div class="card-body">
                            <form method="POST" action="{{ url("/expedientes/{$expedient->id}") }}"
                                  enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedientNro" class="text-md-right">Nro.
                                                Expediente</label>

                                            <input type="number" name="expedientNro"
                                                   value="{{old('expedientNro', $expedient->expedientNro)}}"
                                                   class="form-control {{ $errors->has('expedientNro') ? ' is-invalid' : '' }}"
                                                   required autofocus placeholder="000000">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedientNro'))
                                                    <strong>{{ $errors->first('expedientNro') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="expedientDENro" class="text-md-right">Nro.
                                                Expediente D.E.</label>
                                            <input type="text" name="expedientDENro"
                                                   value="{{old('expedientDENro', $expedient->expedientDENro)}}"
                                                   class="form-control {{ $errors->has('expedientDENro') ? ' is-invalid' : '' }}"
                                                   autofocus placeholder="000000/2000">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('expedientDENro'))
                                                    <strong>{{ $errors->first('expedientDENro') }}</strong>
                                                @endif
                                            </span>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="excerpt" class="text-md-center">Resumen del expediente</label>
                                            <textarea rows="3" name="excerpt" id="excerpt"
                                                      class="form-control {{ $errors->has('excerpt') ? ' is-invalid' : '' }}"
                                                      style="resize: none;">{{ old('excerpt', $expedient->excerpt) }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                                @if ($errors->has('excerpt'))
                                                    <strong>{{ $errors->first('excerpt') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="ordinanceNro" class="text-md-right">Nro. Ordenanza</label>
                                            <input type="text" name="ordinanceNro" id="ordinanceNro"
                                                   value="{{ old('ordinanceNro', $expedient->ordinanceNro) }}"
                                                   class="form-control {{ $errors->has('ordinanceNro') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('ordinanceNro'))
                                                    <strong>{{ $errors->first('ordinanceNro') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="resolutionNro" class="text-md-right">Nro. Resolución</label>
                                            <input type="text" name="resolutionNro" id="resolutionNro"
                                                   value="{{ old('resolutionNro', $expedient->resolutionNro) }}"
                                                   class="form-control {{ $errors->has('resolutionNro') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('resolutionNro'))
                                                    <strong>{{ $errors->first('resolutionNro') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="projectType" class="text-md-right">Tipo de
                                                proyecto</label>
                                            <input type="text" name="projectType"
                                                   value="{{ old('projectType', $expedient->projectType) }}"
                                                   class="form-control {{ $errors->has('projectType') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('projectType'))
                                                    <strong>{{ $errors->first('projectType') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="subject" class="text-md-right">Tema</label>
                                            <input type="text" name="subject"
                                                   value="{{ old('subject', $expedient->subject) }}"
                                                   class="form-control {{ $errors->has('subject') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('subject'))
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="secondary_subject" class="text-md-right">Tema secundario</label>
                                            <input type="text" name="secondary_subject"
                                                   value="{{ old('secondary_subject', $expedient->secondary_subject) }}"
                                                   class="form-control {{ $errors->has('secondary_subject') ? ' is-invalid' : '' }}">
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('secondary_subject'))
                                                    <strong>{{ $errors->first('secondary_subject') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="creation_date"
                                                   class="text-md-right">Fecha de ingreso</label>
                                            <input type="date" name="creation_date"
                                                   value="{{ old('creation_date', $expedient->creation_date) }}"
                                                   class="form-control {{ $errors->has('creation_date') ? ' is-invalid' : '' }}"
                                                   required>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('creation_date'))
                                                    <strong>{{ $errors->first('creation_date') }}</strong>
                                                @endif
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="commission_id" class="text-md-right">Comisión de
                                                destino</label>
                                            <select name="commission_id" id="commission_id"
                                                    class="form-control {{ $errors->has('commission_id') ? ' is-invalid' : '' }}"
                                                    required>
                                                <option
                                                    value="{{$expedient->commission_id}}">{{$expedient->commissions->name}}</option>
                                                @foreach(\App\Models\Commission::all() as $destination)
                                                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('commission_id'))
                                                <strong>{{ $errors->first('commission_id') }}</strong>
                                                @endif
                                                </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="origin" class="text-md-right">Origen</label>
                                            <select name="origin" id="origin"
                                                    class="form-control {{ $errors->has('origin') ? ' is-invalid' : '' }}"
                                                    required>
                                                <option
                                                    value="{{old('origin', $expedient->origin)}}">{{old('state', $expedient->origin)}}</option>
                                                @foreach(\App\Models\Origin::$origins as $origin)
                                                    <option value="{{$origin}}">{{$origin}}</option>
                                                @endforeach
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('origin'))
                                                    <strong>{{ $errors->first('origin') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="archived"
                                                   class="text-md-right">Archivado</label>
                                            <select name="archived" id="archived"
                                                    class="form-control {{ $errors->has('archived') ? ' is-invalid' : '' }}"
                                                    required>
                                                @if($expedient->archived == 0)
                                                    <option value=0>No</option>
                                                    <option value=1>Si</option>
                                                @else
                                                    <option value=1>Si</option>
                                                    <option value=0>No</option>
                                                @endif
                                            </select>
                                            <span role="alert" class="invalid-feedback">
                                                @if ($errors->has('archived'))
                                                    <strong>{{ $errors->first('archived') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="incomeRecord" class="text-md-right">Registro de
                                                entrada</label>
                                            <input type="text" name="incomeRecord"
                                                   class="form-control {{ $errors->has('incomeRecord') ? ' is-invalid' : '' }}"
                                                   value="{{ old('incomeRecord', $expedient->incomeRecord) }}">
                                            <span role="alert" class="invalid-feedback">
                                                                            @if ($errors->has('incomeRecord'))
                                                    <strong>{{ $errors->first('incomeRecord') }}</strong>
                                                @endif
                                                                            </span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="treatmentRecord" class="text-md-right">Registro
                                                de tratamiento</label>
                                            <input type="text" name="treatmentRecord"
                                                   class="form-control {{ $errors->has('treatmentRecord') ? ' is-invalid' : '' }}"
                                                   value="{{ old('treatmentRecord', $expedient->treatmentRecord) }}">
                                            <span role="alert" class="invalid-feedback">
                                                                            @if ($errors->has('treatmentRecord'))
                                                    <strong>{{ $errors->first('treatmentRecord') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="cover" class="text-md-right">Carátula</label>
                                            <textarea rows="6" name="cover" id="cover"
                                                      class="form-control {{ $errors->has('cover') ? ' is-invalid' : '' }}"
                                                      style="resize: none;">{{ old('cover', $expedient->cover) }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                                @if ($errors->has('cover'))
                                                    <strong>{{ $errors->first('cover') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="recommendation" class="text-md-center">Recomendación</label>
                                            <textarea rows="3" name="recommendation" id="recommendation"
                                                      class="form-control {{ $errors->has('recommendation') ? ' is-invalid' : '' }}"
                                                      style="resize: none;">{{ old('recommendation', $expedient->excerpt) }}</textarea>
                                            <span role="alert" class="invalid-feedback">
                                                @if ($errors->has('recommendation'))
                                                    <strong>{{ $errors->first('recommendation') }}</strong>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <input type="hidden" name="user_id" value={{ $expedient->user_id }}>
                                    <span role="alert" class="invalid-feedback">
                                            @if ($errors->has('user_id'))
                                            <strong>{{ $errors->first('user_id') }}</strong>
                                        @endif
                                        </span>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <p class="col-sm-12 text-center font-weight-bold">
                                            Anexos vinculados: &nbsp;</p>
                                    </div>
                                    <div class="list-group" style="width: 90%;margin: 0 5%">
                                            @foreach($expedient->annexes as $annexes)
                                                <p class="list-group-item list-group-item-action text-center">{{$annexes->expedientNro . " - " . $annexes->subject ." - ". $annexes->projectType}}

                                                    <a href="{{ action('ExpedientController@show', ['id' => $annexes->id]) }}"
                                                       target="_blank" role="button" class="btn btn-link">[Ver]</a>
                                                    <a href="{{ action('ExpedientController@detachAnnex', ['annex' => $annexes, 'expedient' => $expedient]) }}"
                                                       role="button" class="btn btn-link"
                                                       style="color: red;">[Desvincular]</a>
                                                </p>
                                            @endforeach
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="text-center" for="pdf_file">Adjuntar archivo (pdf)</label>
                                                @if(!is_null($expedient->file_annex_name))
                                                    <a target="_blank" href="/../storage/{{$expedient->file_annex_name}}"><p class="list-group-item list-group-item-action text-center">{{$expedient->file_annex_name}}</p></a>
                                                @endif
                                                    <input type="file" accept=".pdf" name="pdf_file"
                                                           class="form-control {{ $errors->has('pdf_file') ? ' is-invalid' : '' }}">
                                                    <span role="alert" class="invalid-feedback">
                                                        @if ($errors->has('pdf_file'))
                                                            <strong>{{ $errors->first('pdf_file') }}</strong>
                                                        @endif
                                                    </span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{ URL::previous() }}" role="button"
                                           class="btn btn-link float-left">Volver</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a role="button" class="btn btn-secondary" target="_blank"
                                           href="{{ action('ExpedientController@viewPdf', ['id' => $expedient->id]) }}">Exportar
                                            a PDF</a>
                                        <a href="javascript:window.open('anexar','{{$expedient}}','toolbar=no');void 0"
                                           role="button" class="btn btn-success">Agregar anexo</a>
                                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
