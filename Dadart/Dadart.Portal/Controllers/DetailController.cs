using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Dadart.Portal.Controllers
{
    public class DetailController : Controller
    {
        // GET: Detail
        public ActionResult Product()
        {
            return View();
        }

        public ActionResult Artist()
        {
            return View();
        }
    }
}