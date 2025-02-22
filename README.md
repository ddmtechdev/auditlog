<h1>🔐 RBAC Module Installation Guide</h1>
<p>Follow this guide to install and configure the <strong>ddmtechdev/rbac</strong> module in your Yii2 application.</p>

<hr>

<h2>📌 Installation Steps</h2>

<h3>1️⃣ Install the Package</h3>
<p>Run the following command to install the RBAC module via Composer:</p>
<pre><code>php composer require ddmtechdev/auditlog:@dev</code></pre>

<h3>2️⃣ Run Migrations</h3>
<p>Apply the necessary database migrations:</p>
<pre><code>php yii migrate/up --migrationPath=@vendor/ddmtechdev/auditlog/migrations</code></pre>

<h3>3️⃣ Configure the Application</h3>
<p>Modify your <code>common/config/main.php</code> file and add the following inside the <code>modules</code> array:</p>
<pre><code>
'modules' => [
    'auditlog' => [
        'class' => 'ddmtechdev\auditlog\Module',
    ],
    ...
],
</code></pre>

<h3>4️⃣ Attach the Behavior to Any Model</h3>
<p>Modify your <code>console/config/main.php</code> file and add the following inside the <code>controllerMap</code> array:</p>
<pre><code>
use ddmtechdev\auditlog\behaviors\AuditLogBehavior;

public function behaviors()
{
    return [
        AuditLogBehavior::class,
    ];
}
</code></pre>

<hr>

<h2>🎉 Your AuditLog Module is Now Installed & Configured!</h2>
<p>If you encounter any issues, check the logs or verify that dependencies are correctly installed. 🚀</p>
