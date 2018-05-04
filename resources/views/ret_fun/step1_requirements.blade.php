<div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group" :class="{'has-error': errors.has('procedure_type_id') }">
                <label class="col-sm-3 control-label">Tipo de Pago</label>
                <div class="col-sm-8">
                    <select class="form-control m-b" ref="procedure_type_id" name="procedure_type_id" @change="onChooseProcedureType" v-model="procedure_type_id">
                        <option v-for="type in procedureTypes" :value="type.id" :key="type.id">
                            @{{ type.name }}
                        </option>
                    </select>
                    <i v-show="errors.has('procedure_type_id')" class="fa fa-warning text-danger"></i>
                    <span v-show="errors.has('procedure_type_id')" class="text-danger">@{{ errors.first('procedure_type_id') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group" :class="{'has-error': errors.has('city_end_id') }">
                <label class="col-sm-4 control-label">Regional</label>
                <div class="col-sm-8">
                    <select class="form-control m-b" ref="city_end" name="city_end_id" @change="onChooseCity" v-model="city_end_id" v-validate.initial="'required'">
                        <option v-for="city in cities" :value="city.id" :key="city.id">
                            @{{ city.name }}
                        </option>
                    </select>
                    <i v-show="errors.has('city_end_id')" class="fa fa-warning text-danger"></i>
                    <span v-show="errors.has('city_end_id')" class="text-danger">@{{ errors.first('city_end_id') }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" :class="{'has-error': errors.has('ret_fun_modality') }">
                <label class="col-sm-4 control-label">Modalidad</label>
                <div class="col-sm-8">
                    <select class="form-control" v-model="modality" v-on:change="onChooseModality" ref="modality" name="ret_fun_modality" id="ret_fun_modality" v-validate.initial="'required'">
                        <option v-for="(modality, index) in modalitiesFilter" :value="modality.id" :key="index">@{{modality.name}}</option>
                    </select>
                    <i v-show="errors.has('ret_fun_modality')" class="fa fa-warning text-danger"></i>
                    <span v-show="errors.has('ret_fun_modality')" class="text-danger">@{{ errors.first('ret_fun_modality') }}</span>
                </div>
            </div>
        </div>
    </div>
    <h2>Lista de Requisitos</h2>
    <div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="vote-item" v-for="(requirement, index) in requirementList" :key="index">
            <div class="row" @click="checked(index)" style="cursor:pointer" :class="requirement.status ? 'bg-success-green' : ''">
            {{-- <div class="row" @click="checked(i)" v-for="(rq, i) in requirement" style="cursor:pointer" :key="i"> --}}
                <div class="col-md-10">
                    <div class="vote-actions">
                        {{--  <h1 v-show="groupNumbers(requirement.number) === true">  --}}
                        <h1>
                            @{{requirement.number}}
                            {{-- @{{rq.number}} --}}
                        </h1>
                    </div>
                    <span class="vote-title">@{{requirement.document}}</span>
                    {{-- <span class="vote-title">@{{rq.document}}</span> --}}
                    <div class="vote-info">
                        <div class="col-md-2 no-margins no-padding">
                            <i class="fa fa-comments-o"></i> Comentario:
                        </div>
                        <div class="col-md-6 no-margins no-padding">
                            <input type="text" :name="'comment'+requirement.id" class="form-control">
                            {{-- <input type="text" :name="'comment'+rq.id" class="form-control"> --}}
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="vote-icon">
                        <input type="checkbox" v-model="requirement.status" value="checked" :name="'document'+requirement.id" class="largerCheckbox" >
                        {{-- <input type="radio" v-model="rq.status" :value="rq.status" :name="'document'+rq.number" class="largerCheckbox" > --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{--  <div class="panel panel-success" v-for="(requirement, index) in requirementList" :key="index">
        <span v-if="requirement.number != actualTarget(requirement.number)">
           <div class="panel-heading">@{{requirement.number}}</div>
       </span>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="col-md-10">
                    <span class="m-l-xs">@{{requirement.document}}</span>
                </div>
                <div class="col-md-2">
                    <input type="checkbox" value="checked" :name="'document'+requirement.id" class="i-checks" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-2">
                    Comentarios
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" :name="'comment'+requirement.id">
                </div>
            </div>
        </div>
    </div>  --}}
</div>