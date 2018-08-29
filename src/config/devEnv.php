<?php
if(getenv("LOG4PHPCONFIGFILE") === false)
{
	putenv("LOG4PHPCONFIGFILE=o:\\wwwroot\\PiechockiServicesEsb\\loggerConfig.xml");
}
if(getenv("ISSUERREALMS") === false)
{
	putenv("ISSUERREALMS=https://auth.rubycon.info/auth/realms/interior");
}
if(getenv("COBRADOR_SERVICES_BASE_URL") === false)
{
	putenv("COBRADOR_SERVICES_BASE_URL=http://cobrador");
}
if(getenv("INTERIOR_SSO_PUBLIC_KEY") === false)
{
	putenv("INTERIOR_SSO_PUBLIC_KEY=-----BEGIN PUBLIC KEY-----\nMIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA4PcatlTMswtLoUZ0BA62IUWMTGSp7/SKxKalWpkVUURnVCe9DvPMoh9UJOEAzBx3RsUvT0b6fzQbnHCoDz8gESR9+SdATxAAXjEWNreAjhSDBuXUK3K2lhYbmB8wnec1Il4LuLl+HkjelotmbZNagmEsBEYSzNFFVsFcbgVjvgmh+goVW9wYwvEj4fF6+4P2zSXJmAEaKasNb0T2wSU+9+VuMmDSgG8nC/Ai7ZWKUX+YixOFi/2FGcWVaNAlPzcjet0CRdw009+2iplm4HznREMr/+Kv7rH9d9Z8Oh0tgpkKQRNlsvxttOmt0mjUimOKjANLo1ZnbIpJM6KH79KFViUHuEm1NbkqskpIkaEbJZPGpOpZQzFD1DeHagMdbsoAoXbhyyp/mrpLeR+C9blWaAjRdbYj0z8qJHr2I2przf9xYiO28fNdqFO6WAdngApOhMsJEOuj/D7AWa+UPyL6nCe+DcCFsOqA5gQ42ZtUvfOh28Pc83k8dZbX6HMi+0zii9mt3SFMbgFxGij2jRHoWiEMJLso0jlDl9UPvGev2v3nDceoY7jSrmrwAH1Uqf/c0LwxClkw6pCaE7QbRkwJwR8J7q57qi8sMQE1Cscb2IfiNq79w+l3G+s5tKs2R3JwXdfnAvw4JMoDxSZtDi+C+bJOa5D1/EbBLJ4KwNC6lt0CAwEAAQ==\n-----END PUBLIC KEY-----");
}
if(getenv("INTERIOR_SSO_BASE_URL") === false)
{
	putenv("INTERIOR_SSO_BASE_URL=https://auth.rubycon.info/auth/realms/interior/protocol/openid-connect/token");
}
if(getenv("MASTER_SSO_BASE_URL") === false)
{
	putenv("MASTER_SSO_BASE_URL=https://auth.rubycon.info/auth/realms/master/protocol/openid-connect/token");
}
if(getenv("EXTERIOR_SSO_ADMIN_URL") === false)
{
	putenv("EXTERIOR_SSO_ADMIN_URL=https://auth.rubycon.info/auth/admin/realms/exterior/users");
}
if(getenv("ESB_KEYCLOAK_LOGIN") === false)
{
	putenv("ESB_KEYCLOAK_LOGIN=esb");
}
if(getenv("EBS_KEYCLOAK_PASS") === false)
{
	putenv("EBS_KEYCLOAK_PASS=esbesb");
}
if(getenv("ESB_KEYCLOAK_CLIENT_NAME") === false)
{
	putenv("ESB_KEYCLOAK_CLIENT_NAME=esb");
}
if(getenv("ESB_KEYCLOAK_CLIENT_SECRET") === false)
{
	putenv("ESB_KEYCLOAK_CLIENT_SECRET=dff6c577-9240-45ed-af0a-23422e450286");
}
if(getenv("HITEL_GATEWAY_USERNAME") === false)
{
	putenv("HITEL_GATEWAY_USERNAME=esb");
}
if(getenv("HITEL_GATEWAY_PASSWORD") === false)
{
	putenv("HITEL_GATEWAY_PASSWORD=esb2sbe4");
}
if(getenv("HITEL_GATEWAY_ENDPOINT") === false)
{
	putenv("HITEL_GATEWAY_ENDPOINT=http://hitel/websrv/gateway.php");
}
if(getenv("AKCEPT_ENDPOINT") === false)
{
	putenv("AKCEPT_ENDPOINT=http://akcept/api.v1");
}
if(getenv("GIZMO_ENDPOINT") === false)
{
	putenv("GIZMO_ENDPOINT=http://gizmo/api.v1");
}
