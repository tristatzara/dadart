using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(DadartPortal.Startup))]
namespace DadartPortal
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
