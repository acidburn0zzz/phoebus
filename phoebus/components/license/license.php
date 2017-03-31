<?php
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this
// file, You can obtain one at http://mozilla.org/MPL

// == | Vars | ================================================================

$arrayIncludes = array(
    $arrayModules['dbAddons'],
    $arrayModules['readManifest'],
    
);

$strRequestAddonID = funcHTTPGetValue('id');

// ============================================================================

// == | funcDoLicense | =======================================================

function funcDoLicense($_addonManifest) {
    if ($_addonManifest['metadata']['license'] != null) {
        if ($_addonManifest['metadata']['license'] == 'custom') {
            if($_addonManifest['metadata']['licenseText'] != null) {
                funcSendHeader('text');
                print($_addonManifest['metadata']['licenseText']);
            }
            else {
                funcError($_addonManifest['metadata']['slug'] . ' does not have a license file');
            }
        }
        elseif ($_addonManifest['metadata']['license'] == 'pd') {
            $strPublicDomainText = 'Public Domain
 
The author has chosen to place their submission in the public domain.
This means there is no license attached, the submission is owned by "the public", free for anyone to use, and the author waives any rights (including Copyright) and claims of ownership to it.
The submission or any part thereof may be used by anyone, in any way they see fit, for any purpose.
Once a submission is placed in the public domain, it is no longer possible to claim exclusive rights to it, however it may be used as part of other proprietary software without further requirements of disclosure.';

            funcSendHeader('text');
            print($strPublicDomainText);
        }
        else {
            $strLicenseBaseURL = 'https://opensource.org/licenses/';
            funcRedirect($strLicenseBaseURL . $_addonManifest['metadata']['license']);
        }
    }
    else {
        funcError($_addonManifest['metadata']['slug'] . ' does not have a known license');
    }
    
    // We are done here...
    exit();
}

// ============================================================================

// == | Main | ================================================================

// Sanity
if ($strRequestAddonID == null) {
    funcError('Missing minimum required arguments.');
}

// Includes
foreach($arrayIncludes as $_value) {
    require_once($_value);
}
unset($arrayIncludes);

if (array_key_exists($strRequestAddonID, $arrayAddonsDB)) {
    funcDoLicense(funcReadManifest('license', $arrayAddonsDB[$strRequestAddonID]));
}
else {
    funcError('Unknown add-on ' . $strRequestAddonID);
}

// ============================================================================
?>