<?php
$jsonTestCases = file_get_contents('testcases.json');
$testCases = json_decode($jsonTestCases);
foreach($testCases as $caseName => $caseData) {
    echo "-----------------------------------<br />";
    echo $caseName . ' wordt getest<br />';
    echo 'expected output: <br />';
    echo str_replace("\n", '<br />', str_replace(' ', '&nbsp;', $caseData->expectedOutput)) . '<br /><br />';

    $input = explode("\n", $caseData->input);

    echo "-----------------------------------<br />";
    echo "actual output:<br />";

    extractOutputFromInput($input);
}

function extractOutputFromInput($horses)
{
    $minDiff = 9999999999999999999999999999999999999;
    sort($horses);
    $horses = array_values($horses);

    for ($i = 0; $i < count($horses) - 1; $i++)
    {
        $difference = (int)$horses[$i] - (int)$horses[$i + 1];
        if ($difference < 0) {
            $difference *= -1;
        }
        if ($difference < $minDiff) {
            $minDiff = $difference;
        }
    }

    echo("$minDiff\n");
}
