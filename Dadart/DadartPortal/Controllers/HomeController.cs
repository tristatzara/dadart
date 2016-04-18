using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using ClassLibrary1.Model;
using System.Web.Mvc;
using System.Threading.Tasks;

namespace DadartPortal.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            var c = new CatalogModel();
            Test(c);

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }


        public void Test(CatalogModel c)
        {
            var catalog = c.GetCatalog();
            
        }
    }
}