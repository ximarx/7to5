<?php

namespace SampleNameSpace;

class ADefinedClass {}

namespace AnotherNamespace;

use SampleNameSpace\ADefinedClass;

$var1 = \stdClass::class;
$var2 = ADefinedClass::class;
