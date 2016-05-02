using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(Dadart.Portal.Startup))]
namespace Dadart.Portal
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
