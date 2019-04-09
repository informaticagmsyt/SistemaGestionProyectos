<div class="wizard" id="wizard-basic">
  <!--div class="wizard-wrapper">
    <ul class="wizard-steps">
      <li data-target="#wizard-example-step1">
        <span class="wizard-step-number">1</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Requerimiento
          <span class="wizard-step-description">Registrar un requerimiento para un proyecto</span>
        </span>
      </li>
      <li data-target="#wizard-example-step2">
        <span class="wizard-step-number">2</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Tipo de asesoria
          <span class="wizard-step-description">Ingrese el tipo de requerimiento</span>
        </span>
      </li>
      <li data-target="#wizard-example-step3">
        <span class="wizard-step-number">3</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Step 3
          <span class="wizard-step-description">Third step description. Lorem ipsum dolor sit amet</span>
        </span>
      </li>
      <li data-target="#wizard-example-step4">
        <span class="wizard-step-number">4</span>
        <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
        <span class="wizard-step-caption">
          Finish
        </span>
      </li>
    </ul>
  </div-->
  <div class="wizard-content">
    <div class="" id="">
      <h4>Step 1</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum.
      </p>
      <div class="pull-right">
        <button type="button" class="btn btn-primary" data-wizard-action="next">Next</button>
      </div>
    </div>
    <div class="wizard-pane" id="wizard-example-step2">
      <h4>Step 2</h4>
      <p>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam
        est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius
        modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima
        veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
        commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam
        nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
      </p>
      <div class="pull-right">
        <button type="button" class="btn" data-wizard-action="prev">Prev</button>
        <button type="button" class="btn btn-primary" data-wizard-action="next">Next</button>
      </div>
    </div>
    <div class="wizard-pane" id="wizard-example-step3">
      <h4>Step 3</h4>
      <p>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
        dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
        sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
      </p>
      <div class="pull-right">
        <button type="button" class="btn" data-wizard-action="prev">Prev</button>
        <button type="button" class="btn btn-primary" data-wizard-action="next">Next</button>
      </div>
    </div>
    <div class="wizard-pane" id="wizard-example-step4">
      <h4>Finish</h4>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      </p>
      <div class="pull-right">
        <button type="button" class="btn" data-wizard-action="prev">Prev</button>
        <button type="button" class="btn btn-primary" data-wizard-action="finish">Finish</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(function() {
    $('#wizard-basic').pxWizard();
  });
</script>